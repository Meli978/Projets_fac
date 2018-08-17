/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package chat_test_ultime;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.PrintWriter;
import static chat_test_ultime.Resultat.Resultat;

/**
 *
 * @author melissa
 */
public class Message_client extends Thread {
    private String login, calcul, message_client;
    private BufferedReader in;
    private PrintWriter out;
   
    public Message_client(PrintWriter out, BufferedReader in, String login){
        this.in = in;
        this.out = out;
        this.login = login;
    }
    
    public void run(){
        
        try{
            message_client = in.readLine();
            System.out.println(login + " "+ message_client);
            
            calcul = Resultat(message_client);
            out.println(calcul);
            out.flush();
            
            
        }
        catch(IOException e){
               e.printStackTrace(); 
        }
        
        
    }
}
