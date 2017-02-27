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
public class Ship {
    
    int voi_id;
    int voi_num_voile;
    String voi_nom;
    int cla_id;
    int pro_id;

    public Ship(int voi_id, int voi_num_voile, String voi_nom, int cla_id, int pro_id) {
        this.voi_id = voi_id;
        this.voi_num_voile = voi_num_voile;
        this.voi_nom = voi_nom;
        this.cla_id = cla_id;
        this.pro_id = pro_id;
    }
    
    
    
}
