/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;

/**
 *
 * @author afpa
 */
public class Licencie extends Personne {

    int numLicence;
    double pointsFFV;
    int anneeLicence;
    double nbPoints = 0;

    public Licencie(int numLicence, double pointsFFV, int anneeLicence, String nom, String prenom, String email, int anneeNaissance) {
        super(nom, prenom, email, anneeNaissance);
        this.numLicence = numLicence;
        this.pointsFFV = pointsFFV;
        this.anneeLicence = anneeLicence;
    }   

    public double calculPoints(double points, Date date) {
        Calendar calendar = new GregorianCalendar();
        calendar.setTime(date);
        if (anneeLicence == calendar.get(Calendar.YEAR)) {
            nbPoints = pointsFFV + points;
        } else {
            System.out.println("la date ne corresponde à l'année de la licence");
        }
        return nbPoints;
    }

    @Override
    public String toString() {
        return super.toString() + " est un licencié. Il possède le numéro de licence n° " + numLicence + ". A l'instant présent, il est crédité de " + pointsFFV + " points au classement FFV";
    }

}
