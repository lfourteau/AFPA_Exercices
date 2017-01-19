/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gestStudent;

import java.util.*;

import model.*;

/**
 *
 * @author afpa
 */
public class GestStudent {

    static Scanner sc = new Scanner(System.in);
    static List<Formation> formations = new ArrayList<>();

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

        fillFormations();
        createStagiaire();

    }

    public static void fillFormations() {
        Formation f1 = new Formation(1, "Maths");
        Formation f2 = new Formation(2, "Français");
        Formation f3 = new Formation(3, "Dévellopeur Logiciel");
        Formation f4 = new Formation(4, "Anglais");

        formations.add(f1);
        formations.add(f2);
        formations.add(f3);
        formations.add(f4);
    }

    public static void createStagiaire() {

        char response = 'o';
        Stagiaire s = null;
        List<Stagiaire> Stagiaires = new ArrayList<>();
        while (response == 'o') {

            String nom = null;
            String prenom = null;
            String matricule = UUID.randomUUID().toString();
            int id = 0;
            Formation f = null;

            System.out.println("Veuillez entrer votre nom");
            nom = sc.nextLine();
            System.out.println("Veuillez entrer votre prénom");
            prenom = sc.nextLine();
            System.out.println("Veuillez choisir le numéro correspondant à votre formation : ");
            for (Formation form : formations) {
                System.out.println(form.getId() + " " + form.getNom());
            }
            id = sc.nextInt();
            while (id != 1 && id != 2 && id != 3 && id != 4) {
                System.out.println("Veuillez entrer une valeur connue");
                id = sc.nextInt();
            }

            for (Formation form : formations) {
                if (form.getId() == id) {
                    f = form;
                    break;
                }
            }

            s = new Stagiaire(nom, prenom, matricule, f);

            Stagiaires.add(s);
            System.out.println(s.getPrenom() + " " + s.getNom() + " ajouté avec succès en " + s.getF().getNom());
            System.out.println("Voulez-vous entrer une autre personne ? (o/n)");
            sc.nextLine();
            response = sc.nextLine().charAt(0);

            while (response != 'o' && response != 'n') {

                System.out.println("Voulez-vous entrer une autre personne ? (o/n)");
                response = sc.nextLine().charAt(0);
            }
        }

        System.out.println("Byyyyye" + "\nListe des stagiaires :");
        for (Stagiaire stag : Stagiaires) {
            System.out.println(stag.getNom() + " " + stag.getPrenom() + " " + stag.getMatricule() + " " + stag.getF().getNom());
        }
    }

    public static void createFormation() {

        char response = 'o';
        Formation f = null;

        while (response == 'o') {

            int id = 0;
            String nom = null;

            System.out.println("Veuillez entrer l'identifiant de la formation");
            id = sc.nextInt();
            System.out.println("Veuillez entrer le nom de la formation");
            sc.nextLine();
            nom = sc.nextLine();

            f = new Formation(id, nom);

            System.out.println(f.getId() + " " + f.getNom() + " ajouté avec succès");
            System.out.println("Voulez-vous entrer une autre formation ? (o/n)");
            response = sc.nextLine().charAt(0);
            formations.add(f);

            while (response != 'o' && response != 'n') {

                System.out.println("Voulez-vous entrer une autre personne ? (o/n)");
                response = sc.nextLine().charAt(0);
            }
        }

        System.out.println("Byyyyye ");
        for (Formation form : formations) {
            System.out.println(form.getId() + " " + form.getNom());
        }
    }
}
