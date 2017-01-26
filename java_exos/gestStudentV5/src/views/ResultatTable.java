/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package views;

import java.util.List;
import javax.swing.table.AbstractTableModel;
import model.Resultat;

/**
 *
 * @author afpa
 */
public class ResultatTable extends AbstractTableModel {

    private final String[] entetes = {"ECF", "Resultat"};
    private List<Resultat> resultats;

    public ResultatTable(List<Resultat> resultats) {
        this.resultats = resultats;
    }

    public void addResultat(Resultat resultat) {
        resultats.add(resultat);
        this.fireTableDataChanged();
    }
    
    public void setResultatList(List<Resultat> resultats) {
        this.resultats = resultats;
    }

    @Override
    public String getColumnName(int column) {
        return entetes[column];
    }

    @Override
    public int getRowCount() {
        return resultats.size();
    }

    @Override
    public int getColumnCount() {
        return entetes.length;
    }

    public Resultat getFormation(int rowIndex) {
        return resultats.get(rowIndex);
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        switch (columnIndex) {

            case 0:
                return resultats.get(rowIndex).getEcf().getEcf_nom();

            case 1:
                if (resultats.get(rowIndex).getValid() == false) {
                    return "Non validé";
                } else {
                    return "Validé";
                }
            default:
                throw new IllegalArgumentException();
        }

    }

}
