package chat_test_ultime;


import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.InetAddress;
import java.net.Socket;
import java.util.Scanner;

public class client {
    
    public static void main (String [] args){
        Socket client;
        
        try{
            client = new Socket(InetAddress.getLocalHost(), 2009);
            Thread t = new Thread(new Connexion(client));
            t.start();
                
                       
        }
        catch(IOException e){
            e.printStackTrace();
            
        }
        
    }
}

