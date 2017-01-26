/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.ArrayList;

/**
 *
 * @author afpa
 */

public class ECF {
    
private int id;
private String ecf_nom;
int form_id;
ArrayList<Stagiaire> stagiaires = new ArrayList();

    public ECF(int id, String ecf_nom, int form_id) {
        this.id = id;
        this.ecf_nom = ecf_nom;
        this.form_id = form_id;
    }
        public ECF(String ecf_nom) {
        this.ecf_nom = ecf_nom;
    }

 

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
    public int getForm_id() {
        return form_id;
    }

    public void setForm_id(int form_id) {
        this.form_id = form_id;
    }

    public String getEcf_nom() {
        return ecf_nom;
    }

    public void setEcf_nom(String ecf_nom) {
        this.ecf_nom = ecf_nom;
    }
}
