/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.Date;

/**
 *
 * @author lucas
 */
public class Personne {
    int per_id;
    String per_nom;
    String per_prenom;
    Date per_date;

    public Personne(String per_nom, String per_prenom) {
        this.per_nom = per_nom;
        this.per_prenom = per_prenom;
    }
    
    
}
