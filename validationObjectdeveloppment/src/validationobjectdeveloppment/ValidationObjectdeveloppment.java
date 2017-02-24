/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package validationobjectdeveloppment;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.GregorianCalendar;
import model.Commissaire;
import model.Licencie;

/**
 *
 * @author afpa
 */
public class ValidationObjectdeveloppment {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws ParseException {
        Licencie l1 = new Licencie(215, 25, 2017, "fourteau", "lucas", "sqsdqd@qsdqs.v", 1985);
        System.out.println(l1.toString());
        DateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
        String dateString = "2017-02-11";
        Date dateObject = sdf.parse(dateString);
        System.out.println(l1.calculPoints(8, dateObject));
    }
}
