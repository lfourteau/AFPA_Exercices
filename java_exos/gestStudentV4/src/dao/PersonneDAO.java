/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.sql.Connection;
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

    
    
    
    
    
}


