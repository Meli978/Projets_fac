/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package chat_test_ultime;

public class Resultat {
    ////////////////////////////calcul /////////////
   
    public static String Resultat(String expression){
        
        String message_final = "";
        char [] operateur = {'+', '-', '*', '/'};
        String operateur_message = "";
       
        double [] nombre = new double[2];
        int i = 0;
        boolean entier = false;
        boolean operateur_trouve= false;
        double nombre_message;
        double resultat ;
        boolean resultatMessage =  false;
            
        
        //enlever tous les blancs
        expression = expression.replaceAll(" ", "");
          
         
      i = 0;
      
      while(!operateur_trouve ){
        
        
        for(int j = 0; j< operateur.length; j++){
            
           if (expression.charAt(i) == operateur[j]){
            operateur_message = Character.toString(operateur[j]);
               
            operateur_trouve = true;
            break;
            
              }
           else{
               operateur_trouve = false;
           }
        }
         
        i ++;
      }
        
        //mettre les nombres dans le tableau
        i = 0;
        //diviser la chaine en fct de l'operateur present
        if(!operateur_trouve){
           message_final = "Veuillez entrer un operateur pour effectuer le calcul";
        }
        
        else{
            //remplir le tableau des nombres 
           
             for (String retval: expression.split("\\"+operateur_message)) {
             //verifier pr chaque nombre si un nombre
            //si le cas le mettre dans le tableau sinon arret
                 try{
                     //enlever les blancs
                     retval = retval.trim();
                     nombre_message = Double.parseDouble(retval);
                      nombre[i] = nombre_message ;
                      i ++;
                      entier = true;
                 }
                 catch(NumberFormatException e){
                     entier = false;
                     break;
                 }
             
                }
        }
        
        //calcul et affichage resultat
        
        if (!entier){
            message_final = "Votre calcul ne presente pas de nombres, calcul impossible";
        }
        else{
            //calcul
            //trouver le bon operateur pr initialise la variable resultat correctement
                switch(operateur_message){
                    
                    case "+": resultat = 0;
                              break;
                    case "*": resultat = 1;
                              break;
                    case "/": resultat = 1;
                              break;
                    case "-": resultat = 0;
                              break;
                              
                    default: resultat = 0;
                    
                }
                
            for (i = 0; i< nombre.length; i ++){
                switch(operateur_message){
                    
                    case "+": resultat = resultat + nombre[i];
                              break;
                    case "*": resultat = resultat * nombre[i];
                              break;
                    case "/": try{
                                if(i + 1 < nombre.length){
                                    if(nombre[i+1] == 0){
                                        resultatMessage = true;
                                        message_final = "Division par zero, impossible";
                                    }
                                    else{
                                    resultat = nombre[i]/nombre[i+1];
                                    }
                                }
                                 }
                              catch(Exception e){
                                  e.printStackTrace();
                                  
                              }
                            break;
                    
                              
                    case "-": resultat = Math.abs(resultat - nombre[i]);
                              break;
                              
                    
                }
                
            }

                if(!resultatMessage){         
                    message_final = "Le resultat est : "+resultat;
                }
            
        }
               
        return message_final;
    }

}
