/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package chat_test_ultime;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Scanner;

/**
 *
 * @author melissa
 */
public class Message_serveur extends Thread {
    
    private PrintWriter out;
    private BufferedReader in;
    private Scanner sc;
    private String mon_message, message_serveur;
    
    public Message_serveur(PrintWriter out, BufferedReader in){
        this.out = out;
        this.in = in;
        
    }
    
    public void run(){
        
        try{
        sc = new Scanner(System.in);
        mon_message = sc.nextLine();
        
        //envoyer le calcul au serveur
        out.println(mon_message);
        out.flush();
        
       
        //afficher le message du serveur
        message_serveur = in.readLine();
        System.out.println(message_serveur);
        
        }
        catch(IOException e){
            e.printStackTrace();
        }
    }
    
}
