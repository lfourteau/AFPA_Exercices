/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author afpa
 */
public class Stagiaire extends Personne {                                       // ajouter extends pour hériter de Personne

    private String matricule;
    Formation f;
    

    //Constructeur
    public Stagiaire(String nom, String prenom, String matricule, Formation f) {
        super(nom, prenom);                                                             // hérite du constructeur de personne
        this.matricule = matricule;                                                    // propre au stagiaire donc pas hérité de personne, à ajouter
        this.f = f;
    }

    // Getter and Setter
    public String getMatricule() {
        return matricule;
    }

    public void setMatricule(String matricule) {
        this.matricule = matricule;
    }

    public Formation getF() {
        return f;
    }

    public void setF(Formation f) {
        this.f = f;
    }
    

}
