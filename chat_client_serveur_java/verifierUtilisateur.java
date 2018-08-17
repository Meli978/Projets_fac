/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package chat_test_ultime;

import static chat_test_ultime.connecterDB.connecterDB;
import com.mysql.jdbc.Connection;
import com.mysql.jdbc.Statement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class verifierUtilisateur{
    
    static Connection cnx;
    static Statement st;
    static ResultSet rst;
    
    public static boolean verifierUtilisateur(String login, String password){
        String pass="";
        boolean valid = false;
        
        try{
             String query = "SELECT * FROM chat WHERE pseudo ='" +login+"'";
             cnx = connecterDB();
             st  = (Statement) cnx.createStatement();
             rst = st.executeQuery(query);
             
             //recuperer le vrai password
                 while (rst.next()){
                     pass = rst.getString("password");
                     
                 }
                 
             rst.last();
             int nbrRow = rst.getRow();
             if(nbrRow == 1){
      
                     if (pass.equals(password)){
                         valid = true;
                     }
                     
                     else{
                         valid = false;
                     }          
                              
              }
             else{
                   inserer_user(login, password);
                   valid = true;
             }
             
             
         }
        
         catch(SQLException e){
             System.out.println(e.getMessage());
             
         }
     
    
    return valid;

}
      public static void inserer_user(String login, String password){
         try{
            String query = "INSERT INTO chat(pseudo, password) VALUES ('"+login+"','"+password+"')";
            cnx = connecterDB();
            st = (Statement) cnx.createStatement();
            st.executeUpdate(query);
             
            
            
        }
        catch(SQLException e){
            System.out.println(e.getMessage());
            
        }
    }
}