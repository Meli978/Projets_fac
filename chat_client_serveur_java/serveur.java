
package chat_test_ultime;


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
import java.util.Scanner;
import static chat_test_ultime.connecterDB.connecterDB;


public class serveur {
    
     public  static void main(String [] args){
         
         ServerSocket socketduserveur;
         
        try{
        socketduserveur = new ServerSocket(2009);
        System.out.println("Un client veut se connecter");
        System.out.println("Le serveur est à l'écoute du port "+socketduserveur.getLocalPort());
        
        Thread t = new Thread(new Authentification(socketduserveur));
        t.start();
                      
        }
        catch(IOException e){
            e.printStackTrace();
        }
        
    }
}












