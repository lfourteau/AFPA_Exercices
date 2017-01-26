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
public class ResultatDAO {

    public static List<Resultat> findBy(Stagiaire s) {

        Connection connection = ConnectDB.getConnection();

        ArrayList<Resultat> resultats = new ArrayList();
        PreparedStatement stmShowResultat;

        try {
          
            stmShowResultat = connection.prepareStatement("SELECT p.nom, p.prenom, e.ecf_nom, r.validate FROM personne p INNER JOIN stagiaire s on p.id = s.pers_id INNER JOIN resultat r on s.matricule = r.stag_id INNER JOIN ecf e on r.ecf_id = e.id WHERE s.matricule = ?");
            stmShowResultat.setString(1, s.getMatricule());            
            ResultSet rs = stmShowResultat.executeQuery();

            while (rs.next()) {
                String ecf_nom = rs.getString("ecf_nom");
                Boolean validate = rs.getBoolean("validate");
                String nom = rs.getString("nom");
                String prenom = rs.getString("prenom");
                

                ECF e = new ECF(ecf_nom);
                Stagiaire stag = new Stagiaire(nom,prenom);
                Resultat r = new Resultat(e, stag, validate);
                resultats.add(r);
            }
            rs.close();
        } catch (SQLException e) {
            throw new RuntimeException();
        }
        return resultats;
    }
}
