
package chat_test_ultime;



import com.mysql.jdbc.Connection;
import java.sql.*;

public class connecterDB {
    public static void main(String [] args){
        Connection cnx = connecterDB();
    }
    
    public static Connection connecterDB(){
        try{
            //chemin du driver
            Class.forName("com.mysql.jdbc.Driver");
            String url = "jdbc:mysql://localhost:3306/mini_chat";
            String user = "root";
            String pass = "";
            
            Connection cnx = (Connection) DriverManager.getConnection(url, user, pass);
            return cnx;
        }
        catch(Exception e){
            e.printStackTrace();
            System.out.println("Impossible de se connecter a la base de donnees");
            return null;
        }
}
}

