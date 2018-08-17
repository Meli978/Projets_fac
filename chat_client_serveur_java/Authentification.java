
package chat_test_ultime;

import static chat_test_ultime.connecterDB.connecterDB;
import static chat_test_ultime.verifierUtilisateur.verifierUtilisateur;
import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;
import java.sql.ResultSet;
import java.sql.SQLException;



public class Authentification implements Runnable{
    
    private ServerSocket socketduserveur;
    private Socket       serveur;
    private BufferedReader in;
    private PrintWriter out;
    private String login;
    private String password;
    private boolean valid = false;
       
    
    public  Authentification(ServerSocket s){
        socketduserveur = s;
        
    }
    
    public void run(){
        try{
            
         while(true){
        serveur = socketduserveur.accept();
        System.out.println("Un client vient de se connecter");
        
        in = new BufferedReader(new InputStreamReader(serveur.getInputStream()));
        out = new PrintWriter(serveur.getOutputStream());
                
        //Recuperer les donnees du client
        //partie login
        //msg
        out.println("Entrez votre login");
        out.flush();
        
        //recuperer login
        login = in.readLine();
             
        //partie password
        //msg
        out.println("Entrez votre mot de passe");
        out.flush();
        
        //partie verification
        
        while(!valid){
        //recuperer password
        password = in.readLine();
           
        valid = verifierUtilisateur(login, password);
                
                if (!valid){
                    out.println("Retapez votre mot de passe");
                    out.flush();
                }
                
                else{
                    out.println("Authentifie");
                    out.flush();
                    System.out.println(login + "vient de se connecter");
                    
                }
                
        }
        valid = false; 
        //message client
        Thread t2 = new Thread(new Message_client(out,in,login));
        t2.start();
      
            }
        }
        catch(IOException e){
            e.printStackTrace();
        }
        
    }

}

