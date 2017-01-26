/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package views;

import gestStudent.MainMethodes;
import java.util.List;
import javax.swing.table.AbstractTableModel;
import model.Stagiaire;
/**
 *
 * @author afpa
 */
public class StagiaireTable extends AbstractTableModel {
    private final String[] entetes = {"matricule", "nom", "prenom", "formation", "notes"};
    private List<Stagiaire> stagiaires;

    public StagiaireTable(List<Stagiaire> stagiaires) {
        this.stagiaires = stagiaires;
    }
    
    public void addStagiaire(Stagiaire stagiaire) {
        stagiaires.add(stagiaire);
        this.fireTableDataChanged();
    }

    @Override
    public String getColumnName(int column) {
        return entetes[column];
    }

    @Override
    public int getRowCount() {
        return stagiaires.size();
    }

    @Override
    public int getColumnCount() {
        return entetes.length;
    }

    public Stagiaire getStagiaire(int rowIndex) {
        return stagiaires.get(rowIndex);
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        switch (columnIndex) {

            case 0:
            return stagiaires.get(rowIndex).getMatricule();

            case 1:
            return stagiaires.get(rowIndex).getNom();
                
            case 2:
            return stagiaires.get(rowIndex).getPrenom();
            
            case 3:
            return stagiaires.get(rowIndex).getForm().getNom();
            
            case 4:
            return MainMethodes.test();

            default:
                throw new IllegalArgumentException();
        }

    }
}
