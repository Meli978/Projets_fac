
package chat_test_ultime;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.util.Scanner;

 public class Connexion implements Runnable{
    
    private Socket socket;
    private String message_distant;
    private String login;
    private String password;
    private BufferedReader in;
    private PrintWriter out;
    private Scanner sc;
    private boolean authentifier = false;
    
    
    public Connexion (Socket client){
        socket = client;
    }
    
    public void run(){
        
            try{
                 
            
             System.out.println("Demande de connexion");
             out = new PrintWriter(socket.getOutputStream());
             in = new BufferedReader(new InputStreamReader(socket.getInputStream()));
             sc = new Scanner(System.in);
                          
            //partie login
             //afficher le msg du serveur entrer votre login
            
            message_distant = in.readLine();
            System.out.println(message_distant);
             
             //envoi du login
            
            login = sc.nextLine();
         
            out.println(login);
            out.flush();
            
            //partie password
              //afficher le msg du serveur entrer votre motdepasse 
            message_distant = in.readLine();
            System.out.println(message_distant);
            
              while(!authentifier){
            //envoi du password
      
            password = sc.nextLine();
            
            out.println(password);
            out.flush();
            
            //test pr l'authentification
            message_distant = in.readLine();
            
            if (message_distant == "Authentifie"){
                authentifier = true;
                
            }
            else{
                authentifier = false;
            }
            
            System.out.println(message_distant);
            
            }
      
                 //partie chat
                 Thread t = new Thread(new Message_serveur(out,in));
                 t.start();
                      
            }
            
            catch(IOException e){
                e.printStackTrace();
            }
             
            

          
    }

  
}
