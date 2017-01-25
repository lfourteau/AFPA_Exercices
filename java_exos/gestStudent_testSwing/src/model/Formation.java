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
public class Formation {
    
    private int id;
    private String nom;
    ArrayList<Stagiaire> stagiaires = new ArrayList();
    ArrayList<ECF> ecfs = new ArrayList();
   

    // constructeur
    public Formation(int id, String nom) {
        this.id = id;
        this.nom = nom;
    }

    
    // Getter and setter
    public int getId() {
        return id;
    }
    
    public void addStagiaire (Stagiaire stag) {
        this.stagiaires.add(stag);
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

    public ArrayList<Stagiaire> getStagiaires() {
        return stagiaires;
    }

    public void setStagiaires(ArrayList<Stagiaire> stagiaires) {
        this.stagiaires = stagiaires;
    }  
    
}
