package com.example.afpa.garageapp.model;

/**
 * Created by afpa on 13/02/17.
 */

public class Avis {

    int avis_id;

    int garage_id;
    String avis;


    public Avis(int avis_id, int garage_id, String avis) {
        this.avis_id = avis_id;
        this.garage_id = garage_id;
        this.avis = avis;
    }

    public Avis(String avis) {
        this.avis = avis;

    }

    public int getAvis_id() {
        return avis_id;
    }

    public void setAvis_id(int avis_id) {
        this.avis_id = avis_id;
    }


    public int getGarage_id() {
        return garage_id;
    }

    public void setGarage_id(int garage_id) {
        this.garage_id = garage_id;
    }

    public String getAvis() {
        return avis;
    }

    public void setAvis(String avis) {
        this.avis = avis;
    }


    @Override
    public String toString() {
        return "Avis{" +
                "avisitems='" + avis + '\'' +
                '}';
    }
}
