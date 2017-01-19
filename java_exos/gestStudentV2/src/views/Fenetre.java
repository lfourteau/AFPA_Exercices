/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package views;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.FlowLayout;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;

/**
 *
 * @author afpa
 */
public class Fenetre extends JFrame {

    public Fenetre() {       
        this.setTitle("gestStudent");
        this.setLocationRelativeTo(null);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setSize(800, 500);
        this.setVisible(true);
        this.setLocation(0, 0);
        JPanel container = new JPanel();
        JPanel boutons = new JPanel();
        container.setLayout(new FlowLayout());
        container.setBackground(Color.LIGHT_GRAY);
        boutons.setSize(50, 50);
        container.add(boutons);
        
        JButton b1 = new JButton("Créer un nouveau stagiaire");
        JButton b2 = new JButton("Voir les notes");
        JButton b3 = new JButton("Créer une formation");
        JButton b4 = new JButton("Voir les formations");
        
        boutons.add(b1);
        boutons.add(b2);
        boutons.add(b3);
        boutons.add(b4);

        this.setContentPane(container);
        
        
    }

}
