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
    static char[] tableauComputerNumbers = new char[4];
    static char[] tableauPlayerNumbers = new char[4];

    /**
     * @param args the command line arguments
     */
    public static void generateComputerCode() {

        for (int i = 0; i < tableauComputerNumbers.length; i++) {
            tableauComputerNumbers[i] = Integer.toString((int) (Math.random() * (9 - 1 + 1)) + 1).charAt(0);
        }
    }

    public static void setPlayerCode() {
        System.out.println("\nVeuillez entrer votre code");
        String codePlayer = sc.nextLine();

        for (int a = 0; a < tableauPlayerNumbers.length; a++) {
            tableauPlayerNumbers[a] = codePlayer.charAt(a);
        }
    }

    public static String compareResults() {
        String result = "";
        for (int c = 0; c < 4; c++) {

            if (tableauComputerNumbers[c] == tableauPlayerNumbers[c]) {
                result += "V";
            } else {
                for (int p = 0; p < 4; p++) {
                    if ((tableauComputerNumbers[c] == tableauPlayerNumbers[p]) && (p != c)) {
                        result +="O";
                        break;
                    }
                }
            } 
        }
        return result;
    }

    public static void main(String[] args) {

        generateComputerCode();
        System.out.print(tableauComputerNumbers);

        int t = 0;
        Boolean win = false;
        // un while pour le nbr de tours
        while (win == false && t < 10) {
        setPlayerCode();
            String result = compareResults();
            if (result.equals("VVVV")) {
                win= true;
            }
            System.out.print(result);
            t++;
        }
    }
}
