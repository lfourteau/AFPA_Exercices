/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gestStudent;

import dao.*;
import java.util.List;
import java.util.Scanner;
import model.*;
import views.Fenetre;

/**
 *
 * @author afpa
 */
public class MainMethodes {

    static Scanner sc = new Scanner(System.in);
    static StagiaireDAO sdao = new StagiaireDAO();
    static FormationDAO fdao = new FormationDAO();
    static ResultatDAO rdao = new ResultatDAO();
    static List<Formation> findAllFormations = fdao.findAll();

    public static void createStagiaire() throws Exception {

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
            System.out.print(form.getId() + " " + form.getNom() + "\n");
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

  
    public static void showStagiaireResultat(Stagiaire stag) {
        
//        System.out.println("Veuillez entrer le nom du stagiaire");
//        String nom = sc.nextLine();
        String nom = stag.getNom();
        String prenom = stag.getPrenom();

//        System.out.println("Veuillez entrer le prénom du stagiaire");
//        String prenom = sc.nextLine();
        Personne p = new Personne(nom, prenom);

        List<Resultat> findResultatsBy = rdao.findBy(p);

        System.out.println("ECF de " + prenom + " " + nom);

        for (Resultat result : findResultatsBy) {
            String resultName = null;
            if (result.getValid() == true) {
                resultName = "Validé";
            } else {
                resultName = "Non validé";
            }
            System.out.println(result.getEcf().getEcf_nom() + " " + resultName);
        }
    }

    public static String matricule() {

        //Création des deux premières lettres
        String chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        String letters = "";
        for (int i = 0; i < 2; i++) {
            int x = (int) Math.floor(Math.random() * 26);
            letters += chars.charAt(x);
        }

        //création des 6 chiffres suivants        
        String chars2 = "1234567890";
        String numbers = "";
        for (int i = 0; i < 6; i++) {
            int x = (int) Math.floor(Math.random() * 10);
            numbers += chars2.charAt(x);
        }

        //création matricule
        String matricule = "";
        matricule = letters + numbers;

        return matricule;
    }

    public static void showFormation() {
        System.out.println("Les formations disponibles");
        for (Formation form : findAllFormations) {
            System.out.println(form.getNom() + " " + form.getStagiaires());
        }
    }

    public static String[] displayFormation() {
        
        String formationTab[] = new String[findAllFormations.size()];
        for (int i = 0; i < formationTab.length; i++) {
            formationTab[i] = findAllFormations.get(i).getNom();
        }        
        return formationTab;
    }
}
