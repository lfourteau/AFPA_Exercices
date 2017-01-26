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
import model.Formation;
import model.Stagiaire;

/**
 *
 * @author afpa
 */
public class FormationDAO {
     public static List<Formation> findAll() {

        Connection connection = ConnectDB.getConnection();
        Statement stm;
        

        ArrayList<Formation> formations = new ArrayList();

        try {
            stm = connection.createStatement();

            String sql = "select * from formation";
            ResultSet rs = stm.executeQuery(sql);

            while (rs.next()) {
                int id = rs.getInt("id");
                String nom = rs.getString("nom");

                Formation f = new Formation(id, nom);

                formations.add(f);

            }
            rs.close();

        } catch (SQLException e) {
            throw new RuntimeException();
        }

        return formations;
    }
     
     public static void insert(Formation f) throws Exception {
        Connection connection = ConnectDB.getConnection();

        PreparedStatement stmCreateFormation;

        try {
            connection.setAutoCommit(false);
            stmCreateFormation = connection.prepareStatement("INSERT INTO formation (nom) VALUES (?);");
            stmCreateFormation.setString(1, f.getNom());
            stmCreateFormation.execute();

            connection.commit();
            stmCreateFormation.close();
            stmCreateFormation.close();

        } catch (SQLException e) {
            //pb if here
            connection.rollback();
            throw new Exception("error while creating personne " + e.getMessage());
        }

    }
}
