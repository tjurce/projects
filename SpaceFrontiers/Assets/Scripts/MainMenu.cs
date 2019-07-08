using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class MainMenu : MonoBehaviour {

    public GameObject menuCanvas;

	// Use this for initialization
	void Start () {
        menuCanvas.SetActive(true);
	}

    public void StartGame()
    {
        SceneManager.LoadScene(1);
    }
}
