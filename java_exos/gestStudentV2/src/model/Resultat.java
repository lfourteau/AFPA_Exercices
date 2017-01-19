/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author afpa
 */

public class Resultat {
    Boolean valid;
    Stagiaire stag;
    ECF ecf;

    public Resultat(ECF ecf, Stagiaire stag, Boolean valid) {
        this.stag = stag;
        this.ecf = ecf;
        this.valid = valid;
    }

    public Boolean getValid() {
        return valid;
    }

    public void setValid(Boolean valid) {
        this.valid = valid;
    }

    public Stagiaire getStag() {
        return stag;
    }

    public void setStag(Stagiaire stag) {
        this.stag = stag;
    }

    public ECF getEcf() {
        return ecf;
    }

    public void setEcf(ECF ecf) {
        this.ecf = ecf;
    }

    
    
    
    
}
