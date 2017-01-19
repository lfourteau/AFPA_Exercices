/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package testjframe;

import java.awt.Panel;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;


/**
 *
 * @author afpa
 */
public class Fenetre extends JFrame {
    private JPanel pan = new JPanel();
    
    private JButton bouton = new JButton("Mon premier bouton");
    
    public Fenetre(){
    this.setTitle("Test Bouton");
    this.setSize(400, 500);
    this.setLocationRelativeTo(null);      
    this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);             
//    this.setContentPane(new Panneau());
    pan.add(bouton);
    this.setContentPane(pan);
    this.setVisible(true);

  }
}
