/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import model.*;

/**
 *
 * @author afpa
 */
public class PersonneDAO {

    public List<Personne> findAll() {

        Connection connection = ConnectDB.getConnection();
        Statement stm;

        ArrayList<Personne> personnes = new ArrayList();

        try {
            stm = connection.createStatement();

            String sql = "select * from personne";
            ResultSet rs = stm.executeQuery(sql);

            while (rs.next()) {
                int id = rs.getInt("id");
                String nom = rs.getString("nom");
                String prenom = rs.getString("prenom");

                Personne p = new Personne(id, nom, prenom);

                personnes.add(p);

            }
            rs.close();

        } catch (SQLException e) {
            throw new RuntimeException();
        }

        return personnes;
    }

    public static void delete(Personne p) throws Exception {
        Connection connection = ConnectDB.getConnection();

        PreparedStatement stmDeletePersonne;


        try {
            connection.setAutoCommit(false);
            stmDeletePersonne = connection.prepareStatement("DELETE FROM personne WHERE id = ?;");
            stmDeletePersonne.setInt(1, p.getId());            
            stmDeletePersonne.execute();
            connection.commit();
            stmDeletePersonne.close();
        } catch (SQLException e) {
            //pb if here
            connection.rollback();
            throw new Exception("error while deleting personne " + e.getMessage());
        }
    }

}
