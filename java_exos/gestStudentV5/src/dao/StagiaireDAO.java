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
public class StagiaireDAO {
    
     public static List<Stagiaire> findAll() {

        Connection connection = ConnectDB.getConnection();
        Statement stm;
        

        ArrayList<Stagiaire> stagiaires = new ArrayList();

        try {
            stm = connection.createStatement();

            String sql = "select s.matricule, p.id as persID, p.nom, p.prenom, f.id, f.nom as nomFormation from stagiaire s inner join personne p on s.pers_id = p.id inner join formation f on s.form_id = f.id";
            ResultSet rs = stm.executeQuery(sql);

            while (rs.next()) {
                String matricule = rs.getString("matricule");
                String nom = rs.getString("nom");
                String prenom = rs.getString("prenom");
                String nomFormation = rs.getString("nomFormation");
                int id = rs.getInt("id");
                int persID = rs.getInt("persID");
                
                Formation f = new Formation(id, nomFormation);

                Stagiaire s = new Stagiaire(matricule, persID, nom, prenom, f);

                stagiaires.add(s);

            }
            rs.close();

        } catch (SQLException e) {
            throw new RuntimeException();
        }
        return stagiaires;
    }

    public static void insert(Stagiaire s) throws Exception {
        Connection connection = ConnectDB.getConnection();

        PreparedStatement stmCreatePersonne;
        PreparedStatement stmCreateStagiaire;

        try {
            connection.setAutoCommit(false);
            stmCreatePersonne = connection.prepareStatement("INSERT INTO personne (nom, prenom) VALUES (?, ?);", Statement.RETURN_GENERATED_KEYS);
            stmCreatePersonne.setString(1, s.getNom());
            stmCreatePersonne.setString(2, s.getPrenom());
            stmCreatePersonne.execute();

            //Permet d'obtenir l'id auto-incrémenté
            ResultSet rs = stmCreatePersonne.getGeneratedKeys();
            if (!rs.next()) {
                throw new Exception("humm cannot get generated personne id");
            }
            s.setId(rs.getInt(1));

            stmCreateStagiaire = connection.prepareStatement("INSERT INTO stagiaire (matricule, pers_id, form_id) VALUES (?,?,?);");
            stmCreateStagiaire.setString(1, s.getMatricule());
            stmCreateStagiaire.setInt(2, s.getId());
            stmCreateStagiaire.setInt(3, s.getForm().getId());
            stmCreateStagiaire.execute();

            connection.commit();
            stmCreatePersonne.close();
            stmCreateStagiaire.close();

        } catch (SQLException e) {
            //pb if here
            connection.rollback();
            throw new Exception("error while creating personne " + e.getMessage());
        }

    }
    public static void update(Stagiaire s) throws Exception {
        Connection connection = ConnectDB.getConnection();

        PreparedStatement stmUpdatePersonne;
        PreparedStatement stmUpdateStagiaire;

        try {
            connection.setAutoCommit(false);
            stmUpdatePersonne = connection.prepareStatement("UPDATE personne set nom = ?, prenom = ? where id = ?", Statement.RETURN_GENERATED_KEYS);
            stmUpdatePersonne.setString(1, s.getNom());
            stmUpdatePersonne.setString(2, s.getPrenom());
            stmUpdatePersonne.setInt(3, s.getId());
            stmUpdatePersonne.execute();            

            stmUpdateStagiaire = connection.prepareStatement("UPDATE stagiaire set form_id = ? where pers_id = ?");
            stmUpdateStagiaire.setInt(1, s.getForm().getId());
            stmUpdateStagiaire.setInt(2, s.getId());
            
            stmUpdateStagiaire.execute();

            connection.commit();
            stmUpdatePersonne.close();
            stmUpdateStagiaire.close();

        } catch (SQLException e) {
            //pb if here
            connection.rollback();
            throw new Exception("error while updating personne " + e.getMessage());
        }

    }
}
