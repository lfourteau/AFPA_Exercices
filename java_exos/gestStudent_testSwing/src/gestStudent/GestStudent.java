/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gestStudent;

import java.util.*;

import views.*;

/**
 *
 * @author afpa
 */
public class GestStudent {

    static Scanner sc = new Scanner(System.in);

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws Exception {
        Fenetre fen = new Fenetre();
        

        System.out.println("1 Créer un nouveau stagiaire");
        System.out.println("2 Voir les notes");
        System.out.println("3 Créer une formation");
        System.out.println("4 Voir les formations ");
        System.out.println("5 test ");
        int menu = Integer.parseInt(sc.nextLine());

        if (menu == 1) {
            MainMethodes.createStagiaire();
        }
        if (menu == 2) {
            MainMethodes.showStagiaireResultat();
        }
        if (menu == 3) {
            MainMethodes.showFormation();
        }
        if (menu == 4) {
            //voir les formations
        }
    }
}
