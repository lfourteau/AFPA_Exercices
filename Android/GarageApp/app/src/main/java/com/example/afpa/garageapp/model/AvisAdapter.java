package com.example.afpa.garageapp.model;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import com.example.afpa.garageapp.R;

import java.util.List;

/**
 * Created by afpa on 14/02/17.
 */

public class AvisAdapter extends ArrayAdapter<Avis> {


    public AvisAdapter(Context context, List<Avis> avis) {
        super(context, 0, avis);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        // Get the data Avis for this position
        Avis avis = getItem(position);

        // Check if an existing view is being reused, otherwise inflate the view
        if (convertView == null) {
            convertView = LayoutInflater.from(getContext()).inflate(R.layout.avisitems, parent, false);
        }

        // Lookup view for data population
        final TextView title = (TextView) convertView.findViewById(R.id.avisItemTxt);


        title.setText(avis.getAvis());

        return convertView;

    }
}
