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
        Boolean valid = false;
        while (valid == false) {
            int atFirstPosition = 0;
            int atSecondPosition = 0;
            int lastPointPosition = 0;
            email = sc.nextLine();
            for (int i = 0; i < email.length(); i++) {
                char x = email.charAt(i);
                if (x == '@') {
                    if (atFirstPosition == 0) {
                        atFirstPosition = i;
                    } else {
                        atSecondPosition = i;
                    }
                }
                if (x == '.') {
                    lastPointPosition = i;
                }
            }
            if (atFirstPosition > 1 && ((lastPointPosition - atFirstPosition) > 2) && ((email.length() - lastPointPosition) > 2) && (atSecondPosition == 0)) {
                System.out.println("email valide");
                valid = true;
            }
            if (valid == false){
            System.out.println("email invalide, essaye encore");               
            }
        }
    }
}
