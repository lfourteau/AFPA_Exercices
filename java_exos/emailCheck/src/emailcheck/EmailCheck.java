/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package emailcheck;

import java.util.Scanner;

/**
 *
 * @author root
 */
public class EmailCheck {

    static Scanner sc = new Scanner(System.in);

    public static void main(String[] args) {
        System.out.println("Veuillez entrer votre email");
        String email;
        int atPosition = 0;
        int firstPointPosition =0;
        int lastPointPosition = 0;
        Boolean valid = false;
        while (valid == false) {
            email = sc.nextLine();
            for (int i = 0; i < email.length(); i++) {
                char x = email.charAt(i);
                if (x == '@') {
                    atPosition = i;
                }
                if (x == '.') {
                    firstPointPosition = i;
                    break;
                }
                if (x == '.') {
                    lastPointPosition = i;
                }
            }
            if (atPosition > 1 && (firstPointPosition > (atPosition+2)) && ((firstPointPosition - atPosition) > 2) && (email.length()-lastPointPosition)>2) {
                System.out.println("email valide");
                valid = true;
            }
            if (valid == false) {
                System.out.println("email invalide, eassaye encore");
            }
        }
    }
}
