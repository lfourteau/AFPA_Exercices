/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.ArrayList;
import java.util.Objects;

 
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
    public Formation(String nom) {
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

    @Override
    public String toString() {
        return nom;
    }   

    @Override
    public int hashCode() {
        int hash = 5;
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
        final Formation other = (Formation) obj;
        if (this.id != other.id) {
            return false;
        }
        return true;
    }
    
    
}
