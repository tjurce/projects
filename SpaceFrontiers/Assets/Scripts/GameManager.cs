using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class GameManager : MonoBehaviour {

    public static GameManager gm;

    public Text energyText;
    public Text timeText;
    public Text scoreText;
    public Text finalScoreText;
    public Text levelCompletedText;

    public PlayerController playeController;

    public Texture2D texture;

    public GameObject player;
    public GameObject gameOverCanvas;
    public GameObject UICanvas;
    public GameObject finishCanvas;
    public GameObject playerExplosionParticle;

    public AudioSource mainMusic;
    public AudioSource levelFinishedAudio;
    public AudioSource explosionSound;

    public float time = 30;
    private float score = 0;

    public int currentLevel;

    // Use this for initialization
    void Start () {
        gm = this;
        Cursor.SetCursor(texture, new Vector2(10, 10), CursorMode.Auto);
        UICanvas.SetActive(true);
        gameOverCanvas.SetActive(false);
        finishCanvas.SetActive(false);
        scoreText.text = "Score: 0";
        mainMusic.Play();
    }
	
	// Update is called once per frame
	void Update () {
        float energyLeft = (playeController.engineEnergy / 2.0f) * 100;
        if (energyLeft <= 0)
            energyText.text = "0.00%";
        else if (energyLeft >= 100)
            energyText.text = "100.00%";
        else
            energyText.text = energyLeft.ToString("F2") + "%";

        time -= Time.deltaTime;
        timeText.text = time.ToString("F2") + "s";

        if (time <= 0)
        {
            timeText.text = "0.00s";
            GameOver();
        }

        scoreText.text = "Score: " + score.ToString();
    }

    public void GameOver()
    {
        GameObject clone = Instantiate(playerExplosionParticle, new Vector3(player.transform.position.x, player.transform.position.y, player.transform.position.z - 5f), Quaternion.identity);
        Destroy(player);
        Destroy(clone, 5f);
        explosionSound.Play();
        UICanvas.SetActive(false);
        gameOverCanvas.SetActive(true);
        finalScoreText.text = "Score: " + score.ToString();
        levelFinishedAudio.Play();
    }

    void AddToScore()
    {
        score += Mathf.RoundToInt((time / 30) * 100);
    }

    public void AddEnemyToScore(int add)
    {
        score += add;
    }

    public void Finish()
    {
        AddToScore();
        Destroy(player);
        UICanvas.SetActive(false);
        finishCanvas.SetActive(true);
        levelCompletedText.text = "LEVEL COMPLETED!\nScore: " + score.ToString();
        levelFinishedAudio.Play();
    }
}
