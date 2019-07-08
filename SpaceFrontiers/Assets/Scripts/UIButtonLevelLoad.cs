using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class UIButtonLevelLoad : MonoBehaviour {

    public void LoadLevel()
    {
        SceneManager.LoadScene(GameManager.gm.currentLevel);
    }

    public void NextLevel()
    {
        Debug.Log(GameManager.gm.currentLevel);
        GameManager.gm.currentLevel++;
        Debug.Log(GameManager.gm.currentLevel);
        SceneManager.LoadScene(GameManager.gm.currentLevel);
    }
}
