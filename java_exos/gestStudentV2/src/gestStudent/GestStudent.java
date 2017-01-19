/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gestStudent;

import java.util.*;

import model.*;
import dao.*;



/**
 *
 * @author afpa
 */
public class GestStudent {

    static Scanner sc = new Scanner(System.in); 
    static StagiaireDAO sdao = new StagiaireDAO();
    static FormationDAO fdao = new FormationDAO();
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws Exception {
        
       List<Formation> findAllFormations = fdao.findAll();
        
        // Variables
        String nom;
        String prenom;
        int id;
        
        //Saisie des différentes valeurs composant un stagiaire
        System.out.println("Veuillez entrer votre nom");
        nom = sc.nextLine();
        
        System.out.println("Veuillez entrer votre prénom");
        prenom = sc.nextLine();
        
        System.out.println("Veuillez choisir le numéro correspondant à votre formation : ");
        for (Formation form : findAllFormations) {
        System.out.print(form.getId() + " " + form.getNom()+"\n");
        }
        id = sc.nextInt();
        //Si le numéro est supérieur à la longueur globale de la liste de formations ==> renvoie un code d'erreur
        while (id > findAllFormations.size()) {
                System.out.println("Veuillez entrer une valeur connue");
                id = sc.nextInt();
            }
        //Remplissage de l'objet Formation avant de l'injecter dans l'objet Stagiaire
        Formation f = null;
        for (Formation form : findAllFormations) {
                if (form.getId() == id) {
                    f = form;
                    break;
                }
            }
        //création de l'objet Stagiaire réccupérant les valeures entrées.        
        Stagiaire s;
        String matricule = matricule();
        s = new Stagiaire(matricule, nom, prenom, f);
        //envoie de l'objet stagiare en BDD en utilisant la méthode insert de la classe StagiareDAO (instancié tou en haut)
        sdao.insert(s);   
        
        System.out.println("Stagiaire ajouté avec succès");
    }
    
    public static String matricule() {            
           
        //Création des deux premières lettres
        String chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        String letters = "";        
        for (int i = 0; i < 2; i++) {
            int x = (int)Math.floor(Math.random() * 26);
	       letters += chars.charAt(x);
        }
        
        //création des 6 chiffres suivants        
        String chars2 = "1234567890";
        String  numbers = "";        
        for (int i = 0; i < 6; i++) {
            int x = (int)Math.floor(Math.random() * 10);
	       numbers += chars2.charAt(x);
        }
        
        //création matricule
        String matricule = "";    
        matricule = letters + numbers;

        return matricule;
    }
}
