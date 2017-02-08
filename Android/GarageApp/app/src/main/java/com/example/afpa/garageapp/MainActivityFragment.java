package com.example.afpa.garageapp;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

/**
 * A placeholder fragment containing a simple view.
 */
public class MainActivityFragment
        extends Fragment
        implements OnMapReadyCallback,
        GoogleMap.OnMarkerClickListener {

    public MainActivityFragment() {
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        final View rootView = inflater.inflate(R.layout.fragment_main, container, false);
        final MapFragment mapFragment = (MapFragment) getActivity().getFragmentManager().findFragmentById(R.id.map);

        mapFragment.getMapAsync(this);

        return rootView;

    }

    @Override
    public void onMapReady(GoogleMap googleMap)
    {
//      Ajout d'un listener au clic sur un marqueur
        googleMap.setOnMarkerClickListener(this);

        googleMap.addMarker(new MarkerOptions()                                 //Permet d'ajouter un marker
                .position(new LatLng(48.583328, -3.833333))                     //Définit la longitude et latitude
                .title("Morlaix"));                                             //Définit le titre qui apparaitra dans l'infobulle
    }

    @Override
    public boolean onMarkerClick(Marker marker)
    {
        return false;
    }



}
