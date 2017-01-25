/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package views;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;

/**
 *
 * @author afpa
 */
public class Fenetre extends JFrame {

    public Fenetre() {       
        this.setTitle("gestStudent");
        this.setLocationRelativeTo(null);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(500, 500);
        this.setVisible(true);
        this.setLocation(0, 0);
        
        JOptionPane ta = new JOptionPane();
        JButton b1 = new JButton("Entrer le nom du stagiaire");
        Panneau pan = new Panneau();
        pan.add(b1);
        pan.add(ta);
        
        

        this.setContentPane(pan);
        
        
    }

}
