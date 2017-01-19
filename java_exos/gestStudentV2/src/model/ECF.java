/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.ArrayList;

/**
 *
 * @author afpa
 */

public class ECF {
    
private int id;
private String nom;
int form_id;
ArrayList<Stagiaire> stagiaires = new ArrayList();

    public ECF(int id, String nom, int form_id) {
        this.id = id;
        this.nom = nom;
        this.form_id = form_id;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public int getForm_id() {
        return form_id;
    }

    public void setForm_id(int form_id) {
        this.form_id = form_id;
    }
    
    
    



}
