/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author lucas
 */
public class Owner extends Personne {
    int pro_id;
    int pro_num_club;
    int pers_id;

    public Owner(int pro_id, String per_nom, String per_prenom) {
        super(per_nom, per_prenom);
        this.pro_id = pro_id;
    }

    public int getPro_id() {
        return pro_id;
    }

    public void setPro_id(int pro_id) {
        this.pro_id = pro_id;
    }

    public int getPro_num_club() {
        return pro_num_club;
    }

    public void setPro_num_club(int pro_num_club) {
        this.pro_num_club = pro_num_club;
    }

    public int getPers_id() {
        return pers_id;
    }

    public void setPers_id(int pers_id) {
        this.pers_id = pers_id;
    }

  
    
    
    
}
