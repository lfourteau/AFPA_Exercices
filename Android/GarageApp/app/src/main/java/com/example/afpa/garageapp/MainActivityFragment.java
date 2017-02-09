package com.example.afpa.garageapp;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.afpa.garageapp.model.Garage;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import java.util.List;
import java.util.concurrent.ExecutionException;

/**
 * A placeholder fragment containing a simple view.
 */
public class MainActivityFragment
        extends Fragment
        implements OnMapReadyCallback,
        GoogleMap.OnMarkerClickListener {

    private List<Garage> garages;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        //Appelle la class FindGarage qui lance la connection à l'API pour réccupérer tous les garages
        FindGarages data = new FindGarages();
        data.execute();
        try {
            //Rempli la liste garages avec ce qui est reçu
            garages = data.get();
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }
        //Créer la vue / fond google map
        final View rootView = inflater.inflate(R.layout.fragment_main, container, false);
        final MapFragment mapFragment = (MapFragment) getActivity().getFragmentManager().findFragmentById(R.id.map);

        mapFragment.getMapAsync(this);

        return rootView;
    }

    //Génère les markers sur la carte en fonction des données reçues dans la list de garages via l'API
    @Override
    public void onMapReady(GoogleMap googleMap) {
//      Ajout d'un listener au clic sur un marqueur
        googleMap.setOnMarkerClickListener(this);

        for (Garage gar : garages) {
            String concName = gar.getConcessionnaire();
            if (concName == "") {
                concName = "Ancun";
            }
            googleMap.addMarker(new MarkerOptions()                                 //Permet d'ajouter un marker
                    .position(new LatLng(gar.getLatitude(), gar.getLongitude()))    //Définit la longitude et latitude
                    .title(gar.getNom() + " " + gar.getId())                        //Définit le titre qui apparaitra dans le titre de l'info-bulle
                    .snippet("concessionnaire :" + concName));                      //Définit le sous-titre qui apparaitra dans le titre de l'info-bulle
        }
    }

    @Override
    public boolean onMarkerClick(Marker marker) {
        return false;
    }


}
