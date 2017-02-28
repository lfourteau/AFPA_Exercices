package com.example.afpa.dahouetregresults;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.CursorAdapter;
import android.widget.Spinner;
import android.widget.TextView;

import com.example.afpa.dahouetregresults.database.GetRegates;
import com.example.afpa.dahouetregresults.model.Regate;

import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.ExecutionException;

import static android.R.attr.data;

public class MainActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {
    Spinner regSpinner;
    TextView regListTxt;
    private List<Regate> regatesList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        regSpinner = (Spinner) findViewById(R.id.regSpinner);
        regListTxt = (TextView) findViewById(R.id.regListTxt);

        regatesList = new ArrayList();

        regSpinner.setOnItemSelectedListener(this);

        GetRegates data = new GetRegates();
        data.execute();
        try {
            //Rempli la liste garages avec ce qui est reçu
            regatesList = data.get();
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }
        populateSpinner();

    }

    private void populateSpinner() {
        List<String> labels = new ArrayList();

        regListTxt.setText("");

        for (int i = 0; i < regatesList.size(); i++) {
            labels.add(regatesList.get(i).getReg_libelle());
        }

        // Creating adapter for spinner
        ArrayAdapter<String> spinnerAdapter = new ArrayAdapter<String>(this,
                android.R.layout.simple_spinner_item, labels);

        // Drop down layout style - list view with radio button
        spinnerAdapter
                .setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        // attaching data adapter to spinner
        regSpinner.setAdapter(spinnerAdapter);
    }

    @Override
    public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {

    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }
}
