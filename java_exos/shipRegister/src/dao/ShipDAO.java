/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import model.Ship;

/**
 *
 * @author afpa
 */
public class ShipDAO {
    public static void insert(Ship s) throws Exception {
        Connection connection = ConnectDB.getConnection();

        PreparedStatement stmCreateFormation;

        try {
            connection.setAutoCommit(false);
            stmCreateFormation = connection.prepareStatement("INSERT INTO voilier (nom) VALUES (?);");
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
