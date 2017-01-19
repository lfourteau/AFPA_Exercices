/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mastermind;

import java.util.*;

/**
 *
 * @author afpa
 */
public class Mastermind {

    static Scanner sc = new Scanner(System.in);

    /**
     * @param args the command line arguments
     */
    public static char[] generateComputerCode() {

        char[] tableauComputerNumbers = {Integer.toString((int) (Math.random() * (9 - 1 + 1)) + 1).charAt(0),
            Integer.toString((int) (Math.random() * (9 - 1 + 1)) + 1).charAt(0),
            Integer.toString((int) (Math.random() * (9 - 1 + 1)) + 1).charAt(0),
            Integer.toString((int) (Math.random() * (9 - 1 + 1)) + 1).charAt(0)};

        return tableauComputerNumbers;
    }

    public static void main(String[] args) {
//
        char tableauComputerNumbers[] = generateComputerCode();
     
        System.out.print(tableauComputerNumbers);

        int t = 0;
        Boolean win = false;
        // un while pour le nbr de tours
        while (win == false && t < 10) {
            System.out.println("\nVeuillez entrer votre code");
            String codePlayer = sc.nextLine();
            char tableauPlayerNumbers[] = {codePlayer.charAt(0),
                codePlayer.charAt(1),
                codePlayer.charAt(2),
                codePlayer.charAt(3)};

            for (int i = 0; i < 4; i++) {
                if (tableauPlayerNumbers[i] != tableauComputerNumbers[i]) {
                    break;
                } else {
                    if (i == 3) {
                        win = true;
                        System.out.print("You win !!!!");
                        break;
                    }
                }
            }
            if (win == true) {
                break;
            }
            for (int c = 0; c < 4; c++) {
                int x = 0;
                if (tableauComputerNumbers[c] == tableauPlayerNumbers[c]) {
                    x = 1;
                } else {
                    for (int p = 0; p < 4; p++) {
                        if ((tableauComputerNumbers[c] == tableauPlayerNumbers[p]) && (p != c)) {
                            x = 2;
                        }
                    }
                }
                if (x == 1) {
                    System.out.print("V");
                }
                if (x == 2) {
                    System.out.print("O");
                }

            }
            t++;
        }
    }
}
