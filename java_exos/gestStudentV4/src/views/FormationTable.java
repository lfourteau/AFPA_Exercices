/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package views;

import java.util.List;
import javax.swing.table.AbstractTableModel;
import model.Formation;

/**
 *
 * @author afpa
 */
public class FormationTable extends AbstractTableModel {

    private final String[] entetes = {"id", "nom"};
    private List<Formation> formations;

    public FormationTable(List<Formation> formations) {
        this.formations = formations;
    }
    
    public void addFormation(Formation formation) {
        formations.add(formation);
        this.fireTableDataChanged();
    }

    @Override
    public String getColumnName(int column) {
        return entetes[column];
    }

    @Override
    public int getRowCount() {
        return formations.size();
    }

    @Override
    public int getColumnCount() {
        return entetes.length;
    }

    public Formation getFormation(int rowIndex) {
        return formations.get(rowIndex);
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        switch (columnIndex) {

            case 0:
                return formations.get(rowIndex).getId();

            case 1:
                return formations.get(rowIndex).getNom();

            default:
                throw new IllegalArgumentException();
        }

    }

}
