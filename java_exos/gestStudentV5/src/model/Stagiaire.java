/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import dao.ConnectDB;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Objects;

/**
 *
 * @author afpa
 */
public class Stagiaire extends Personne {                                                      // ajouter extends pour hériter de Personne

    String matricule;
    Formation form;
    ArrayList<ECF> ecfs = new ArrayList(); 
    
    

    //Constructeur complet
    public Stagiaire(String matricule, int id, String nom, String prenom, Formation form) {
        super(id, nom, prenom);                                                                         // hérite du constructeur de personne
        this.matricule = matricule;                                                                     // propre au stagiaire donc pas hérité de personne, à ajouter
        this.form = form;
    }
    //Constructeur utilisé pour envoyé en BDD (suppression de pers_id/matricule qui sont auto-incrémentés en BDD
    public Stagiaire(String matricule, String nom, String prenom, Formation form) {
        super(nom, prenom);
        this.matricule = matricule;
        this.form = form;
    }
    public Stagiaire(String nom, String prenom) {
        super(nom, prenom);
    }
    public Stagiaire(int id, String nom, String prenom, Formation form) {
        super(id, nom, prenom);
        this.form = form;
    }
    
    
    

    // Getter and Setter
    public String getMatricule() {
        return matricule;
    }

    public void setMatricule(String matricule) {
        this.matricule = matricule;
    }

    public Formation getForm() {
        return form;
    }

    public void setForm(Formation form) {
        this.form = form;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 89 * hash + Objects.hashCode(this.matricule);
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Stagiaire other = (Stagiaire) obj;
        if (!Objects.equals(this.matricule, other.matricule)) {
            return false;
        }
        return true;
    }
    
}
