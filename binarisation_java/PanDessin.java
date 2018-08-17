package image;
import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.FlowLayout;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.geom.AffineTransform;
import java.awt.image.AffineTransformOp;
import java.awt.image.BufferedImage;
import java.awt.image.ConvolveOp;
import java.awt.image.Kernel;
import java.awt.image.RescaleOp;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
import javax.swing.JButton;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import org.jfree.chart.ChartFactory;
import org.jfree.chart.ChartFrame;
import org.jfree.chart.ChartPanel;
import org.jfree.chart.ChartUtilities;
import org.jfree.chart.JFreeChart;
import org.jfree.chart.axis.NumberAxis;
import org.jfree.chart.axis.NumberTickUnit;
import org.jfree.chart.axis.ValueAxis;
import org.jfree.chart.plot.PlotOrientation;
import org.jfree.chart.plot.XYPlot;
import org.jfree.chart.renderer.xy.XYBarRenderer;
import org.jfree.data.statistics.HistogramDataset;


public class PanDessin extends JPanel  {

	BufferedImage monImage = null;

	public PanDessin() {
		super();

	}

	protected void paintComponent(Graphics g)
	{
		super.paintComponent(g);
		if(monImage != null)
			g.drawImage(monImage, 0, 0, null);
	}


	protected void reduireImage()
	{
		BufferedImage imageReduite = new BufferedImage((int)(monImage.getWidth()*0.5),(int)( monImage.getHeight()*0.5), monImage.getType());
		AffineTransform reduire = AffineTransform.getScaleInstance(0.5, 0.5);
		int interpolation = AffineTransformOp.TYPE_BICUBIC;
		AffineTransformOp retaillerImage = new AffineTransformOp(reduire, interpolation);
		retaillerImage.filter(monImage, imageReduite );
		monImage = imageReduite ;
		repaint();
	}


	protected void agrandirImage()
	{
		BufferedImage imageZoomer = new BufferedImage((int)(monImage.getWidth()*1.5),(int)( monImage.getHeight()*1.5), monImage.getType());
		AffineTransform agrandir = AffineTransform.getScaleInstance(1.5, 1.5);
		int interpolation = AffineTransformOp.TYPE_BICUBIC;
		AffineTransformOp retaillerImage = new AffineTransformOp(agrandir, interpolation);
		retaillerImage.filter(monImage, imageZoomer );
		monImage = imageZoomer ;
		repaint();
	}
        
       protected void seuillage_fixe(int seuil){
                                
	 int width = monImage.getWidth();
         int height = monImage.getHeight();
         BufferedImage imageGris = new BufferedImage(width, height, BufferedImage.TYPE_INT_RGB);
               
            
          
          //comparaison au seuil
         for(int i=0; i<height; i++){
         
            for(int j=0; j<width; j++){
                Color c = new Color(monImage.getRGB(j, i));
                int r = c.getRed();
                int g = c.getGreen();
                int b = c.getBlue();
                int a = c.getAlpha();
                
                int gr = (r + g + b)/3;
                
                if (gr < seuil){
                    gr = 0;
                                      
                }
                else{
                    gr = 255;
                }
                
              
                Color gColor = new Color(gr, gr, gr);
                imageGris.setRGB(j, i, gColor.getRGB());
            }
         }
            
            monImage = imageGris;
            Graphics2D surfaceImg = imageGris.createGraphics();
            surfaceImg.drawImage(monImage, null, null);   
            repaint();
        }
        
//        protected void lyold(){
//            
//         int width = monImage.getWidth();
//         int height = monImage.getHeight();
//         int tab []  = new int [256];
//         int pixel[] = new int [(width * height)];//stocker les pixels de l'image
//         int nbpixel = 0;//nb de pixels de l'image
//         int nb0 = 0, nb1 = 0; //nbr de pixels dans les deux classes respectives
//         BufferedImage imageGris = new BufferedImage(width, height, BufferedImage.TYPE_INT_RGB);
//         
//         /////initialisation du tableau a 0
//           for (int x = 0; x <= 255; x ++){
//                tab[x] = 0;
//              
//                }
//               
//         for(int i=0; i<height; i++){
//         
//            for(int j=0; j<width; j++){
//                Color c = new Color(monImage.getRGB(j, i));
//                int r = c.getRed();
//                int g = c.getGreen();
//                int b = c.getBlue();
//                int a = c.getAlpha();
//                
//                int gr = (r + g + b)/3;
//                
//                pixel[nbpixel] = gr;
//                nbpixel ++;
//                
//                ////histogramme
//                for (int x = 0; x <= 255; x ++){
//                    if (gr == x){
//                       ( tab [x]) ++;
//                    }
//                }
//            }
//         }
//         
//         //////calcul du seuil 
//         float seuil = 0;
//         float somme = 0, moyenne = 0, somme1 = 0, somme2 = 0, moyenne1 = 0, moyenne2 = 0;
//         float variance = 0;
//         int c0[] = new int[(nbpixel )];
//         int c1[] = new int[(nbpixel )];
//         
//        
//         
//            for (int x = 0; x <= 255; x ++){
//             
//             somme = somme + tab[x] * x;
//                
//            }
//             //calcul de la moyenne
//             moyenne = somme / (nbpixel);
//             somme = 0;
//             
//             
//            for (int x = 0; x <= 255; x ++){
//             //calcul de la variance
//             variance = (int)(tab[x] * Math.pow((x - moyenne), 2.0)); 
//             somme = somme + variance;
//            }
//            
//             variance =  somme/ nbpixel ;
//             seuil = moyenne;
//                           
//            
//                  
//             do{
//                 
//             ///les deux classes c0 et c1
//                for(int i= 0; i< nbpixel; i ++){
//                                       
//                    if (pixel[i] < seuil ){
//                        c0[nb0] = pixel[i];
//                        nb0 ++;
//                    }
//                    else{
//                       c1[nb1] = pixel[i];
//                        nb1 ++; 
//                    }
//                }
//                
//             
//                                
//                 ////classe 0
//                 for (int h = 0; h < nb0; h ++){
//                     somme1 = somme1 + (c0[h] * h);
//                 }
//                 
//                 if(nb0 != 0){
//                      moyenne1 = somme1 / nb0;
//                 }
//                 else{
//                     moyenne1 = 0;
//                 }
//                
//                 
//                 ////classe 1
//                 for (int h = 0; h < nb1; h ++){
//                     somme2 = somme2 + (c1[h] * h);
//                 }
//                 
//                 if(nb1 != 0){
//                      moyenne2 = somme2 / nb1;
//                 }
//                 else{
//                     moyenne2 = 0;
//                 }
//                 
//                                
//                 //calcul du nouveau seuil
//                 float p1, p2, p3;
//                 if(((moyenne1 + moyenne2) != 0) && (nb0 != 0)){
//                     
//                     p1 = (float) ((moyenne1 + moyenne2)/2);
//                     p2 =  (float) ((Math.pow(variance, 2))/(moyenne1 + moyenne2)); 
//                     p3 = (float) (p2 * (Math.log((nb1/nb0))));
//                     seuil = Math.round((p1 + p3));
//                     somme2 = 0;
//                     somme1 = 0;
//                     nb0 = 0;
//                     nb1 = 0;
//                       
//                   
//               }
//                 else{
//                     break;
//                 }
//                        
//                       
//              seuil = Math.abs(seuil); 
//                                     
//             }while( seuil > 255);
//             
//           
//             
//           System.out.println((Math.abs(seuil)));
//             
//                 
//         for(int i=0; i<height; i++){
//         
//            for(int j=0; j<width; j++){
//                Color c = new Color(monImage.getRGB(j, i));
//                int r = c.getRed();
//                int g = c.getGreen();
//                int b = c.getBlue();
//                int a = c.getAlpha();
//              
//                int gr = (r + g + b)/3;
//               
//                if (gr < seuil){
//                    gr = 0;
//                                      
//                }
//                else if (gr >= seuil){
//                    gr = 255;
//                }
//                
//                Color gColor = new Color(gr, gr, gr, a);
//                imageGris.setRGB(j, i, gColor.getRGB());
//            }
//         }
//         
//            monImage = imageGris;
//            Graphics2D surfaceImg = imageGris.createGraphics();
//            surfaceImg.drawImage(monImage, null, null);   
//           repaint();
//        
//            
//        }
        
        protected void histogramme(){
            
            
        //partie histogramme
            int height = monImage.getHeight();
            int width  = monImage.getWidth();
            int nbpixel = 0;
            int tab[] = new int[256];
            JButton seuil_btn = new JButton("Seuil");
           
           
            double value[] = new double[(height * width)];
              
         /////initialisation du tableau a 0
           for (int x = 0; x <= 255; x ++){
                tab[x] = 0;
              
                }
               
         for(int i=0; i<height; i++){
         
            for(int j=0; j<width; j++){
                Color c = new Color(monImage.getRGB(j, i));
                int r = c.getRed();
                int g = c.getGreen();
                int b = c.getBlue();
                int a = c.getAlpha();
                
                int gr = (r + g + b)/3;
                
                for(int x = 0; x<= 255; x ++){
                    if(gr == x){
                        tab[x] ++;
                    }
                }
                
                value[nbpixel] = gr;
                nbpixel ++;
            }
         }
         
         
         //pour les ordonnees
         int max = 0;
         
          for(int x = 0; x<= 255; x ++){
             
                  if((tab[x]) > max){
                      max = tab[x];
                                        
                  }
           }
          
          
        //arrondir le max
        int d = 10;
        int resultat = 0;
        int r = 1 ;
        
        while (r != 0){
            resultat = max / d;
            if ((resultat / 10) != 0){
                d = d * 10;
                r = 1;
            }
            else{
                r = 0;
            }
        }
        
        max = (resultat + 1) * d;
    
       int number = 100; //pr la taille des batons
       
       HistogramDataset dataset = new HistogramDataset();
     
       dataset.addSeries("Histogramme",value, number);
       
       String plotTitle = "Histogramme"; 
       String xaxis = "niveaux de grisr";
       String yaxis = "nombre"; 
       PlotOrientation orientation = PlotOrientation.VERTICAL; 
       boolean show = false; 
       boolean toolTips = false;
       boolean urls = false; 
      
       JFreeChart chart = ChartFactory.createHistogram( plotTitle, xaxis, yaxis, 
                dataset, orientation, show, toolTips, urls);
       
      XYPlot plot = (XYPlot) chart.getPlot();
	plot.setRangeGridlinesVisible(true);
	plot.setDomainGridlinesVisible(true);
	plot.setOutlineVisible(true);
	plot.setRangeZeroBaselineVisible(true);
	plot.setDomainZeroBaselineVisible(true);
	plot.getDomainAxis().setTickLabelsVisible(true);

	

	XYBarRenderer renderer = (XYBarRenderer) plot.getRenderer();
         NumberAxis rangeAxis = (NumberAxis) plot.getRangeAxis();
   
	
       
        // for x-axis
     NumberAxis domainAxis = (NumberAxis) plot.getDomainAxis();
    domainAxis.setRange(0, 260); 
    domainAxis.setTickUnit(new NumberTickUnit(10)); 
    domainAxis.setVerticalTickLabels(true); 
    
  
        
       // for y-axis
       rangeAxis.setRange(0, Math.round(max)); 
       rangeAxis.setTickUnit(new NumberTickUnit(5000)); 
       renderer.setDrawBarOutline(false);
       renderer.setShadowVisible(false);
        

       //affichage du graphe
       int width_histogram = 1500;
       int height_histogram = 2000; 
       
       ChartFrame chartPanel = new ChartFrame("Histogramme", chart);
       
       chartPanel.setVisible(true);
       chartPanel.setSize(width_histogram, height_histogram);
       chartPanel.setLayout(new BorderLayout());
       //ajout du bouton 
       chartPanel.add(seuil_btn, BorderLayout.SOUTH);
       
              ////partie bouton
       seuil_btn.addActionListener(new ActionListener(){
                public void actionPerformed(ActionEvent e) {
                  int r = 0;
                  
                  while (r == 0){
                  String input =  JOptionPane.showInputDialog("Entrez un seuil");
                  
                  try{
                      
                  int seuil = Integer.parseInt(input); 
                  if(seuil < 0){
                     JOptionPane.showMessageDialog(null, "Veuillez entrez un nombre positif");
                  }else
                      
                      if (seuil > 255){
                        JOptionPane.showMessageDialog(null, "Veuillez entrez un seuil entre 0 et 255");

                      }
                      else
                        {
                        
                        r = 1;
                        seuillage_fixe(seuil);
                        chartPanel.setVisible(false);
                        }
                  
       
                  }
                  catch(Exception ex){
                      JOptionPane.showMessageDialog(null, "Veuillez entrez un nombre");
                      r = 0;
                  }
                  
                  }
               
                }
       });
       
      
//pour lenregistrer en inage
//        try {
//        ChartUtilities.saveChartAsPNG(new File("/home/melissa/Bureau/histogram.PNG"), chart, width_histogram, height_histogram);
//        } catch (IOException e) {}
      
         }
         
         
        
                

	protected void ajouterImage(File fichierImage)
	{   // desiiner une image à l'ecran	
		try {
			monImage = ImageIO.read(fichierImage);
		} catch (IOException e) {
			e.printStackTrace();
		}
		repaint(); 
	}

	protected BufferedImage getImagePanneau()
	{      // récupérer une image du panneau
		int width  = this.getWidth();
		int height = this.getHeight();
		BufferedImage image = new BufferedImage(width, height,  BufferedImage.TYPE_INT_RGB);
		Graphics2D g = image.createGraphics();

		this.paintAll(g);
		g.dispose();
		return image;
	}

	protected void enregistrerImage(File fichierImage)
	{
		String format ="JPG";
		BufferedImage image = getImagePanneau();
		try {
			ImageIO.write(image, format, fichierImage);
		} catch (IOException e) {
			e.printStackTrace();
		}

	}
}