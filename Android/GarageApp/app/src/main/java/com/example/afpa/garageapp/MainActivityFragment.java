package com.example.afpa.garageapp;

import android.content.Intent;
import android.location.Address;
import android.location.Geocoder;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.EditText;

import com.example.afpa.garageapp.database.FindGarages;
import com.example.afpa.garageapp.model.Garage;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapFragment;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;

import java.io.IOException;
import java.util.ArrayList;
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
    int garage_id;
    private GoogleMap mMap;

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
            //Reccupère le nom du concessionnaire
            String concName = gar.getConcessionnaire();
            //S'il n'y en un pas, indique "aucun"
            if (concName.equals("")) {
                concName = "Ancun";
            }

            //Permet d'ajouter un marker
            Marker marker = googleMap.addMarker(new MarkerOptions()
                    //Définit la longitude et latitude
                    .position(new LatLng(gar.getLatitude(), gar.getLongitude()))
                    //Définit le titre qui apparaitra dans le titre de l'info-bulle
                    .title(gar.getNom())
                    //Définit le sous-titre qui apparaitra dans le titre de l'info-bulle
                    .snippet("concessionnaire : " + concName));
            //Ajoute un tag avec l'identifiant du garage dedans
            marker.setTag(gar.getId());
        }

        //Ecoute sur l'info window du marker selectionné
        googleMap.setOnInfoWindowClickListener(new GoogleMap.OnInfoWindowClickListener() {

            @Override
            public void onInfoWindowClick(Marker marker) {
                //Reccupère l'id du garage présent dans le tag
                garage_id = (int) marker.getTag();
                //Nouvelle Intent pour changer de vue
                Intent openReviewsPage = new Intent(getActivity(), ReviewsPage.class);
                //Envoie le nom et l'id du garage en extras vers la nouvelle vue
                openReviewsPage.putExtra("nom", marker.getTitle());
                openReviewsPage.putExtra("garage_id", "" + (int) marker.getTag());
                //Démarre la nouvelle activité sur la nouvelle vue
                startActivity(openReviewsPage);
            }
        });
    }

    @Override
    public boolean onMarkerClick(Marker marker) {
        return false;
    }

}
