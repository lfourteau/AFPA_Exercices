/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package views;

import dao.FormationDAO;
import java.awt.Component;
import java.awt.Window;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.SwingUtilities;
import model.Formation;

/**
 *
 * @author afpa
 */
public class AddFormationDlg extends javax.swing.JDialog {

    private Fenetre parent;

    /**
     * Creates new form addformationDlg
     */
    public AddFormationDlg(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        this.parent = (Fenetre) parent;

        initComponents();
        this.setLocationRelativeTo(parent);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        GlobalPnl = new javax.swing.JPanel();
        Lbl = new javax.swing.JLabel();
        TxtFld = new javax.swing.JTextField();
        ValidBtn = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);
        setTitle("Ajout d'une formation");
        setLocation(new java.awt.Point(0, 0));
        setLocationByPlatform(true);
        setResizable(false);

        GlobalPnl.setLayout(new javax.swing.BoxLayout(GlobalPnl, javax.swing.BoxLayout.PAGE_AXIS));

        Lbl.setText("Veuillez entrer le nom de la formation");
        Lbl.setVerticalTextPosition(javax.swing.SwingConstants.TOP);
        GlobalPnl.add(Lbl);
        GlobalPnl.add(TxtFld);

        ValidBtn.setText("Valider");
        ValidBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ValidBtnActionPerformed(evt);
            }
        });
        GlobalPnl.add(ValidBtn);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(GlobalPnl, javax.swing.GroupLayout.PREFERRED_SIZE, 290, javax.swing.GroupLayout.PREFERRED_SIZE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(GlobalPnl, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void ValidBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ValidBtnActionPerformed
        // Réccupère la valeur entrée pour le nom dans la JDialog
        String FormationName = TxtFld.getText();
        //Instancie une nuvelle formation contenant ce nom
        Formation f = new Formation(FormationName);
        try {
            //Inser la Formation en BDD
            FormationDAO.insert(f);
            //Permet de fermer la JDialog en retournant à la fenêtre précédente
            java.awt.Toolkit.getDefaultToolkit().beep();
            Window window = SwingUtilities.windowForComponent((Component) evt.getSource());
            window.dispose();
            //Met à jour la liste de formation au besoin
            parent.getFormationTable().addFormation(f);
        } catch (Exception ex) {
            Logger.getLogger(AddFormationDlg.class.getName()).log(Level.SEVERE, null, ex);
        }
        

    }//GEN-LAST:event_ValidBtnActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(AddFormationDlg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(AddFormationDlg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(AddFormationDlg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(AddFormationDlg.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the dialog */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                AddFormationDlg dialog = new AddFormationDlg(new javax.swing.JFrame(), true);
                dialog.addWindowListener(new java.awt.event.WindowAdapter() {
                    @Override
                    public void windowClosing(java.awt.event.WindowEvent e) {
                        System.exit(0);
                    }
                });
                dialog.setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JPanel GlobalPnl;
    private javax.swing.JLabel Lbl;
    private javax.swing.JTextField TxtFld;
    private javax.swing.JButton ValidBtn;
    // End of variables declaration//GEN-END:variables
}
