/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import gestStudent.GestStudent;
 
/**
 *
 * @author afpa
 */
public class Formation {
    
    private int id;
    private String nom;
    

    // constructeur
    public Formation(int id, String nom) {
        this.id = id;
        this.nom = nom;
  
    }
    
     // Getter and setter
   
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
    
    
}
