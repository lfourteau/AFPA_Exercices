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
import model.Owner;

/**
 *
 * @author lucas
 */
public class OwnerDAO {
    public static List<Owner> findAll() {

        Connection connection = ConnectDB.getConnection();
        Statement stm;  

        ArrayList<Owner> owners = new ArrayList();

        try {
            stm = connection.createStatement();

            String sql = "select p.per_prenom, p.per_nom, prop.pro_id from personne p inner join proprietaire prop on p.per_id = prop.per_id";
            ResultSet rs = stm.executeQuery(sql);

            while (rs.next()) {
                int pro_id = rs.getInt("pro_id");
                String pro_nom = rs.getString("per_nom");
                String pro_prenom = rs.getString("per_prenom");

                Owner o = new Owner(pro_id, pro_nom, pro_prenom);

                owners.add(o);
            }
            rs.close();

        } catch (SQLException e) {
            throw new RuntimeException();
        }

        return owners;
    }
}
